@extends('layouts.frontLayout.design')
@section('content')
    <div class="container-fluid" id="app" style="margin-top: 100px">
        <div class="row justify-content-center">

            <div class="mesgs">
                <span class="d-block p-2 bg-warning text-white">{{$name}}</span>
                <div class="msg_history">
                    {{-- <div class="incoming_msg">
        <div class="incoming_msg_img"> </div>
        <div class="received_msg">
          <div class="received_withd_msg">
            <p>Test which is a new approach to have all
              solutions</p>
            <span class="time_date"> 11:01 AM    |    June 9</span></div>
        </div>
      </div>
      <div class="outgoing_msg">
        <div class="sent_msg">
          <p>Test which is a new approach to have all
            solutions</p>
          <span class="time_date"> 11:01 AM    |    June 9</span> </div>
      </div>
      <div class="incoming_msg">
        <div class="incoming_msg_img"></div>
        <div class="received_msg">
          <div class="received_withd_msg">
            <p>Test, which is a new approach to have</p>
            <span class="time_date"> 11:01 AM    |    Yesterday</span></div>
        </div>
      </div>
      <div class="outgoing_msg">
        <div class="sent_msg">
          <p>Apollo University, Delhi, India Test</p>
          <span class="time_date"> 11:01 AM    |    Today</span> </div>
      </div>
      <div class="incoming_msg">
        <div class="incoming_msg_img"></div>
        <div class="received_msg">
          <div class="received_withd_msg">
            <p>We work directly with our designers and suppliers,
              and sell direct to you, which means quality, exclusive
              products, at a price anyone can afford.</p>
            <span class="time_date"> 11:01 AM    |    Today</span></div>
        </div>
      </div> --}}
                    @php
                        foreach ($messages as $key => $message) {
                            if ($message->chat_id == $sender_chat_id) {
                                // echo 'sent: '.$message->body.'<br>';
                                echo '<div class="outgoing_msg">
                <div class="sent_msg">
                  <p>' .$message->body.'</p>
                  <span class="time_date"> You    |    ' .$message->created_at .'</span> </div>
              </div>';
                            } else {
                                // echo 'received: '.$message->body.'<br>';
                                echo '<div class="received_msg">
                <div class="received_withd_msg">
                <p>'.$message->body.'</p>
                <span class="time_date"> '.$name.'    |    '.$message->created_at.'</span></div>
            </div>';
                            }
                        }
                    @endphp
                </div>

                <div class="type_msg">
                    <div class="input_msg_write">
                        <form method="POST">
                            {{ csrf_field() }}
                            <input type="text" id="message" name="message" class="write_msg"
                                placeholder="Type a message" />
                            <input id="msg" type="submit" name="send" value="Send" class="btn btn-warning active">
                        </form>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function () {
    // Handler for .ready() called.
    $('html, body').animate({
        scrollTop: $('#message').offset().top
    }, 'slow');

});


</script>
@endsection
