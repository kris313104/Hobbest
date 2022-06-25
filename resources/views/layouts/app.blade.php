@extends('layouts.frontLayout.design')
@section('content')
    <div class="container-fluid" id="app" style="margin-top: 100px">



        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">
                    <div class="card-header text-center">
                        <h3>{{ __('Find someone to match your interests!') }}</h3>
                    </div>

                    <div class="card-body text-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}


                            </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-4">

                            </div>
                            <div class="col-sm-4">
                                <div class="card text-center">
                                    <div class="card-header">
                                        <h5 class="card-title">@php
                                            echo $name;
                                        @endphp</h5>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-subtitle mb-2 text-muted">@php
                                            echo $gender;
                                        @endphp</h6>
                                        <p class="card-text">@php
                                            echo $description;
                                        @endphp</p>
                                        <form method="POST">
                                            {{ csrf_field() }}
                                            <input type="submit" name="like" value="Like"
                                                class="btn btn-primary <?php if ($name == 'No pairs left!') {
                                                    echo 'disabled';
                                                } ?>">
                                        </form>
                                    </div>
                                    {{-- @php
                                        if(isset($_POST['like'])) {
            DB::select('call like_user('.auth()->user()->id.', '.$u_id.');');
            return redirect('/app')->with('flash_message_success',$message);

        }
                                    @endphp --}}

                                </div>
                            </div>
                            <div class="col-sm-4">

                            </div>
                        </div>
                        @if (Session::has('flash_message_success'))
                            <div style="margin-top: 20px" class="alert alert-success alert-dismissible fade show"
                                role="alert">
                                <strong>{!! session('flash_message_success') !!}</strong>
                            </div>
                        @endif
                        @if (Session::has('flash_message_error'))
                            <div style="margin-top: 20px" class="alert alert-danger alert-dismissible fade show"
                                role="alert">
                                <strong>{!! session('flash_message_error') !!}</strong>
                            </div>
                        @endif
                        <a class="btn btn-danger" type="button" onclick="window.location.reload(true)"
                            style="margin-top: 20px;">Refresh</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-header text-center">
                        <h3>{{ __('Chats') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="card-body text-center">

                                @php

                                    foreach ($chats as $key => $data) {

                                        $is_read = App\Models\Message::isRead(auth()->user()->id, $data['sender_id']);
                                        if(array_key_exists(0, $is_read)){
                                        if($is_read[0]['read']){
                                        echo '<a href="'.route('chat', $data['sender_id']).'" style="margin-bottom: 10px" class="btn btn-warning btn-lg active position-relative">'.$data['name'].'</a><br>';
                                        } else {
                                            echo '<a href="'.route('chat', $data['sender_id']).'" style="margin-bottom: 10px" class="btn btn-warning btn-lg active position-relative">'.$data['name'].'<span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
    <span class="visually-hidden">New alerts</span>
  </span>'.'</a><br>';
                                        }
                                    } else echo '<a href="'.route('chat', $data['sender_id']).'" style="margin-bottom: 10px" class="btn btn-warning btn-lg active position-relative">'.$data['name'].'</a><br>';


                                    }

                                @endphp

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
