<!DOCTYPE html>
<html lang="en">
<head>
    {{-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> --}}
    <title>Uploads PDF</title>
</head>
<body>
    <h2>Uploads Archive</h2>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>Caption</th>
                <th>Media</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->caption }}</td>
                    <td>
                        @if (Str::startsWith(mime_content_type(storage_path('app/public/' . $post->media)), 'video/'))
                            Video
                        @else
                            Image
                        @endif
                    </td>
                    <td>{{ $post->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
