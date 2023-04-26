<!doctype html>
<html lang="en">

<head>
    <title>Nanyang Zhi Hui Modern Indonesian School - Test IT & Programmer</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/png">
    <script src="https://kit.fontawesome.com/ae026c985d.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row justify-content-md-center my-5">
            <div class="col-md-12 text-center">
                <h3><b>Nanyang Zhi Hui Modern Indonesian School</b><br>Test IT & Programmer</h3>
                <a href="/" class="my-3">Home</a>

            </div>
        </div>
        @if (Session::has('success'))
            <div class="row">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p><b>Well done!</b> {{ Session::get('success') }}</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        <form class="form" method="get" action="/process/search">
            @csrf
            <div class="row justify-content-end">
                <div class="form-group w-100 mb-3">
                    <input type="text" name="search" class="form-control w-75 d-inline" id="search"
                        placeholder="Silahkan cari disini...">
                    <button type="submit" class="btn btn-primary mb-1">Cari</button>
                </div>
            </div>
        </form>
        <div class="row justify-content-end">
            <button type="button" class="btn btn-primary px-3" data-toggle="modal" data-target="#addMember"><i
                    class="fas fa-user-plus"></i> Add member</button>
        </div>
        <div class="row my-4">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Full name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone number</th>
                        <th scope="col">Status</th>
                        <th scope="col">~</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getMember as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->phone_number }}</td>
                            <td>
                                @if ($item->idRelated != null)
                                    Head of #{{ $item->idRelated }}
                                @else
                                    Upline
                                @endif
                            </td>
                            <td><a href="/process/get/member/{{ $item->id }}" data-toggle="modal"
                                    data-target="#seeDetailMember{{ $item->id }}"
                                    class="btn btn-success px-3 btn-sm"><i class="far fa-eye"></i>
                                    See Detail</a>
                                <!-- Modal -->
                                <div class="modal fade" id="seeDetailMember{{ $item->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="seeDetailMember{{ $item->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Info data user
                                                    #{{ $item->name }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <b>Detail about the user ID #{{$item->id}}</b> <br>
                                                Name: {{ $item->name }} <br>
                                                Address: {{ $item->address }} <br>
                                                Phone Number: {{$item->phone_number}}
                                                <hr>
                                                <b>Detail about downline related</b><br>
                                                @foreach ($getMember as $item)
                                                Name: {{ $item->name }} <br>
                                                Address: {{ $item->address }} <br>
                                                Phone Number: {{$item->phone_number}} <br> <br>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="/process/get/member/{{ $item->id }}"
                                    class="btn btn-warning px-3 btn-sm"><i class="far fa-edit"></i>
                                    Edit</a>
                                <button type="button" class="btn btn-danger px-3 btn-sm" data-toggle="modal"
                                    data-target="#deleteMember{{ $item->id }}"><i class="far fa-trash-alt"></i>
                                    Delete</button>
                                {{-- #deleteMember --}}
                                <!-- Modal -->
                                <div class="modal fade" id="deleteMember{{ $item->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="deleteMember{{ $item->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Delete data user
                                                    #{{ $item->id }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <b>Are you sure to delete this user and this relation?</b> <br>
                                                Name related is: {{ $item->name }} <br>
                                                ID related is: {{ $item->id }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancel</button>
                                                <a href="/process/delete/member/{{ $item->id }}"
                                                    class="btn btn-primary">Sure!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    {{-- Modal collection --}}
    <!-- #addMember -->
    <div class="modal fade" id="addMember" tabindex="-1" role="dialog" aria-labelledby="addMember"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add new member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/process/new/member" method="post">
                    @csrf
                    <div class="modal-body">
                        <h6 class="mb-4">Fill this form to complete adding new member.</h6>
                        <div class="form-group">
                            <label for="fullName">Full name</label>
                            <input type="text" class="form-control" name="fullName" id="fullName"
                                aria-describedby="fullName" placeholder="Enter your full name" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="address"
                                aria-describedby="address" required>
                        </div>
                        <div class="form-group">
                            <label for="phoneNumber">Phone Number</label>
                            <input type="number" min="11" name="phoneNumber" class="form-control"
                                id="phoneNumber" aria-describedby="phoneNumber" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i>
                            Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
