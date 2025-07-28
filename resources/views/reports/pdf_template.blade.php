<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 10pt;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .filter-info {
            margin-bottom: 20px;
            font-size: 9pt;
        }
        .filter-info p {
            margin: 2px 0;
        }
    </style>
</head>
<body>
    @php
        use Carbon\Carbon;
    @endphp

    <h1>{{ $title }}</h1>

    <div class="filter-info">
        <p><strong>Filter:</strong></p>
        @if($filter_info['month'])
            <p>Bulan: {{ $filter_info['month'] }}</p>
        @endif
        @if($filter_info['year'])
            <p>Tahun: {{ $filter_info['year'] }}</p>
        @endif
        @if($filter_info['platform'])
            <p>Platform: {{ $filter_info['platform'] }}</p>
        @endif
        @if(!$filter_info['month'] && !$filter_info['year'] && !$filter_info['platform'])
            <p>Tidak ada filter diterapkan (Menampilkan semua data).</p>
        @endif
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Konten</th>
                <th>Deskripsi Singkat</th>
                <th>Platform</th>
                <th>Tanggal Upload</th>
                {{-- <th>Viewers (YT)</th> --}}
                <th>Tanggal Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $key => $post)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ Str::limit($post->content, 50) }}</td> {{-- Gunakan Str::limit untuk deskripsi singkat --}}
                    <td>{{ $post->social_media_platform ? ucfirst($post->social_media_platform) : '-' }}</td>
                    <td>{{ $post->upload_date ? Carbon::parse($post->upload_date)->format('d M Y') : '-' }}</td>
                    {{-- <td>{{ $post->youtube_views ? number_format($post->youtube_views) : '-' }}</td> --}}
                    <td>{{ $post->created_at ? Carbon::parse($post->created_at)->format('d M Y H:i') : '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center;">Tidak ada data konten yang ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>