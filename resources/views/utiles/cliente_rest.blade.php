@extends('../layouts.frontend')
@section('title', 'Útiles')
@section('content')
    <main class="container">
        <h1>Cliente Rest</h1>
        <h2>Status: {{ $status }}</h2>
        <p>{{ $json }}</p>
        <p> {{ print_r($headers) }}</p>
        <x-flash />
        <table class="table table-boredered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Channel</th>
                    <th>Owner</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos->list as $dato)
                    <tr>
                        <td><?php echo $dato->id; ?></td>
                        <td><?php echo $dato->title; ?></td>
                        <td><?php echo $dato->channel; ?></td>
                        <td><?php echo $dato->owner; ?></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection
