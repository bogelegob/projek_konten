<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Import model Post
use Barryvdh\DomPDF\Facade\Pdf; // Import DomPDF Facade
use Carbon\Carbon; // Import Carbon untuk tanggal

class ReportController extends Controller
{
    /**
     * Menampilkan form filter laporan.
     */
    public function index()
    {
        // Mendapatkan daftar tahun unik dari kolom created_at di tabel posts
        $availableYears = Post::selectRaw('YEAR(created_at) as year')
                              ->distinct()
                              ->orderBy('year', 'desc')
                              ->pluck('year');

        // Pilihan bulan
        $months = [
            '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
            '04' => 'April', '05' => 'Mei', '06' => 'Juni',
            '07' => 'Juli', '08' => 'Agustus', '09' => 'September',
            '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
        ];

        // Pilihan platform sosial media
        $socialMediaPlatforms = ['youtube', 'tiktok', 'instagram'];

        return view('reports.index', compact('availableYears', 'months', 'socialMediaPlatforms'));
    }

    /**
     * Menghasilkan laporan PDF berdasarkan filter.
     */
    public function generatePdf(Request $request)
    {
        $query = Post::query();

        $month = $request->input('month');
        $year = $request->input('year');
        $platform = $request->input('platform');

        // Filter berdasarkan bulan
        if ($month) {
            $query->whereMonth('created_at', $month);
        }

        // Filter berdasarkan tahun
        if ($year) {
            $query->whereYear('created_at', $year);
        }

        // Filter berdasarkan platform sosial media
        if ($platform) {
            $query->where('social_media_platform', $platform);
        }

        $posts = $query->orderBy('created_at', 'desc')->get();

        // Data untuk tampilan PDF
        $reportTitle = 'Laporan Konten';
        if ($month && $year) {
            $reportTitle .= ' Bulan ' . Carbon::create()->month($month)->format('F') . ' Tahun ' . $year;
        } elseif ($year) {
            $reportTitle .= ' Tahun ' . $year;
        } elseif ($month) {
            $reportTitle .= ' Bulan ' . Carbon::create()->month($month)->format('F');
        }
        if ($platform) {
            $reportTitle .= ' Platform ' . ucfirst($platform);
        }

        $data = [
            'title' => $reportTitle,
            'posts' => $posts,
            'filter_info' => [
                'month' => $month ? Carbon::create()->month($month)->format('F') : null,
                'year' => $year,
                'platform' => $platform ? ucfirst($platform) : null,
            ]
        ];

        // Buat instance PDF dari view
        $pdf = Pdf::loadView('reports.pdf_template', $data);

        // Unduh PDF
        return $pdf->download('laporan-konten-' . Carbon::now()->format('Ymd_His') . '.pdf');
    }
}