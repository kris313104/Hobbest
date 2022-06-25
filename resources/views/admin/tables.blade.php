@extends('layouts.adminLayout.admin_design')
@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12 text-center bg-dark" style="margin-bottom: 20px">
                <img class="img-fluid" style="max-width: 100%; max-height: 400px"
                    src="{{ asset('assets/images/logo_big.png') }}">
                </img>
            </div>
            <div class="container-fluid">
                <div class="dropdown" style="margin-bottom: 20px">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Tables
                    </button>
                    @if (Session::has('flash_message_error'))

                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 20px">
                        <strong>{!! session('flash_message_error') !!}</strong>
                      </div>
                @endif
                @if (Session::has('flash_message_success'))

                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 20px">
                            <strong>{!! session('flash_message_success') !!}</strong>
                          </div>
                    @endif
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" onclick="toggler('users');" href="#users">Users</a></li>
                        <li><a class="dropdown-item" onclick="toggler('chats');" href="#chats">Chats</a></li>
                        <li><a class="dropdown-item" onclick="toggler('messages');" href="#messages">Messages</a></li>
                        <li><a class="dropdown-item" onclick="toggler('interests');" href="#interests">Interests</a></li>

                    </ul>
                </div>
                <table class="table table-striped table-bordered hidden" id="users"
                    style="max-width: none; table-layout: fixed; word-wrap: break-word; display: none;">
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Email</td>

                        <td>Description</td>
                        <td>Gender</td>
                        <td>Pref gender</td>

                        <td>Created at</td>
                        <td>Updated at</td>
                        <td>Admin</td>
                        <td>Operation</td>
                    </tr>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user['id'] }}</td>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['email'] }}</td>

                            <td>{{ $user['description'] }}</td>
                            <td>{{ $user['gender'] }}</td>
                            <td>{{ $user['pref_gender'] }}</td>

                            <td>{{ $user['created_at'] }}</td>
                            <td>{{ $user['updated_at'] }}</td>
                            <td>{{ $user['admin'] }}</td>
                            <td><a class="btn btn-danger" style="margin-bottom: 20px" href={{"tables/deleteuser/".$user['id']}}>Delete</a>
                                <a class="btn btn-danger" href={{"tables/edituser/".$user['id']}}>Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <table class="table table-striped table-bordered hidden" id="chats"
                    style="max-width: none; table-layout: fixed; word-wrap: break-word; display: none;">
                    <tr>
                        <td>Id</td>
                        <td>Sender id</td>
                        <td>Reveiver id</td>
                    </tr>
                    @foreach ($chats as $chat)
                        <tr>
                            <td>{{ $chat['id'] }}</td>
                            <td>{{ $chat['sender_id'] }}</td>
                            <td>{{ $chat['receiver_id'] }}</td>
                        </tr>
                    @endforeach
                </table>
                <table class="table table-striped table-bordered hidden" id="messages"
                    style="max-width: none; table-layout: fixed; word-wrap: break-word; display: none;">
                    <tr>
                        <td>Id</td>
                        <td>Body</td>
                        <td>Chat id</td>
                    </tr>
                    @foreach ($chats as $chat)
                        <tr>
                            <td>{{ $chat['id'] }}</td>
                            <td>{{ $chat['body'] }}</td>
                            <td>{{ $chat['chat_id'] }}</td>
                        </tr>
                    @endforeach
                </table>
                <table class="table table-striped table-bordered hidden" id="interests"
                    style="max-width: none; table-layout: fixed; word-wrap: break-word; display: none;">
                    <tr>
                        <td>Id</td>
                        <td>User1 id</td>
                        <td>User2 id</td>
                    </tr>
                    @foreach ($interests as $interest)
                        <tr>
                            <td>{{ $interest['id'] }}</td>
                            <td>{{ $interest['user1_id'] }}</td>
                            <td>{{ $interest['user2_id'] }}</td>
                        </tr>
                    @endforeach
                </table>



            </div>
        </div>
        <div class="row"></div>
    </div>


    <script>
        function toggler(divId) {

            document.getElementById('users').style =
                "max-width: none; table-layout: fixed; word-wrap: break-word; display: none;"
            document.getElementById('chats').style =
                "max-width: none; table-layout: fixed; word-wrap: break-word; display: none;"
            document.getElementById('messages').style =
                "max-width: none; table-layout: fixed; word-wrap: break-word; display: none;"
            document.getElementById('interests').style =
                "max-width: none; table-layout: fixed; word-wrap: break-word; display: none;"

            $("#" + divId).toggle();
        }
    </script>

@endsection
