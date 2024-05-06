@extends("template.main")

@section('body')
<!-- Contoh view.blade.php -->
<table class="table">
    <thead>
      <tr>

        <th scope="col">Full Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Message</th>
        <th scope="col">Delete</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($msgData as $index => $data)
         <tr>
        <td> {{ $data -> name }}</td>
         <td>{{ $data -> email }}</td>
        <td>{{ $data -> phone }}</td>
         <td>{{ $data -> message }}</td>

         <td>
                <form action="{{ route('delete.message', [$index]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
        </td>


    </tr>
    @endforeach
    </tbody>
  </table>


@endsection
