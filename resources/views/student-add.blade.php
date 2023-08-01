    @extends('layouts.main')

    @section('title', 'Students | add new')

    @section('content')

        <div class="mt-5 col-5 m-auto">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>

            @endif
            <form action="student" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>

                <div class="mb-3">
                    <label for="nis">NIS</label>
                    <input type="text" class="form-control" name="nis" id="nis">
                </div>

                <div class="mb-3">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="">Select One</option>
                        <option value="L">L</option>
                        <option value="P">P</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="class">Kelas</label>
                    <select name="class_id" id="class_id" class="form-control">
                        <option value="">Select One</option>
                        @foreach ($class as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <button class="btn btn-success" type="submit">Save</button>
                </div>
            </form>
        </div>
    @endsection
