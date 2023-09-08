<table>
    <thead>
        <tr>
            <th>Título</th>
            <th>Contenido</th>
            <th>Autor</th>
            <th>Categoría</th>
            <th>Etiquetas</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($posts as $post)
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ $post->body }}</td>
            <td>{{ $post->user->name }}</td>
            <td>{{ $post->category->name }}</td>
            <td>
                @foreach ($post->tags as $tag)
                    {{ $tag->name }}
                @endforeach
            </td>
        </tr>
    @endforeach
</table>
