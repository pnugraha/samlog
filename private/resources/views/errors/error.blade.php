@if (count($errors) > 0)
<div style="height: 100%;" class="modal fade" id="message_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="margin-top: 15%;text-align: center; color: black;" class="modal-dialog">
        <div class="modal-content" style="border-radius: 5px;height: auto;width: 500px;">
            <p style='padding-top: 10px;'><i style="font-size: 5em;color: rgba(211, 2, 2, 0.3);" class="fa fa-times-circle-o" aria-hidden="true"></i></p>
            <h2 style='margin: -15px;'>Error</h2>
            <p style='padding: 20px;'>Error dalam proses penginputan data!</p>
            <!--            <div class="alert alert-danger">
                            <p>Kesalahan dalam penginputan data : </p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li><i class="glyphicon glyphicon-remove"></i> {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>-->
        </div>
    </div>
</div>

@elseif (session('message'))
<div  style="height: 100%;"  class="modal fade" id="message_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="margin-top: 15%;text-align: center; color: black;" class="modal-dialog">
        <div class="modal-content" style="border-radius: 5px;height: auto;width: 500px;">
            @if(session('type') == 'error')
            <p style='padding-top: 10px;'><i style="font-size: 5em;color: rgba(211, 2, 2, 0.3);" class="fa fa-times-circle-o" aria-hidden="true"></i></p>
            <h2 style='margin: -15px;'>Error</h2>
            <p style='padding: 20px;'>{{ session('message') }}</p>
            @endif

            @if(session('type') == 'success')
            <p style='padding-top: 10px;'><i style="font-size: 5em; color: rgba(0, 166, 90, 0.3);" class="fa fa-check-square-o" aria-hidden="true"></i></p>
            <h2 style='margin: -15px;'>Berhasil</h2>
            <p style='padding: 20px;'>{{ session('message') }}</p>  
            @endif

            @if(session('type') == 'warning')
            <p style='padding-top: 10px;'><i style="font-size: 5em; color: rgba(243, 156, 18, 0.3);" class="fa fa fa-exclamation-triangle" aria-hidden="true"></i></p>
            <h2 style='margin: -15px;'>Peringatan</h2>
            <p style='padding: 20px;'>{{ session('message') }}</p>  
            @endif
            <!--            <div class="alert alert-{{ session('type') }}">
                            {{ session('message') }}
                        </div>-->
        </div>
    </div>
</div>
@endif

<script>
    var c = 0;
    var max_count = 3;
    var logout = true;
    startTimer();
    function startTimer() {
        setTimeout(function() {
//            logout = true;
//            c = 0;
//            max_count = 3;
            $('#timer').html(max_count);
            $('#message_popup').modal('show');
            startCount();

        }, 100);
    }

    function resetTimer() {
        logout = false;
        $('#message_popup').modal('hide');
        startTimer();
    }

    function timedCount() {
        c = c + 1;
        var remaining_time = max_count - c;
        if (remaining_time == 0 && logout) {
            $('#message_popup').modal('hide');
            // location.href = $('#logout_url').val();

        } else {
            $('#timer').html(remaining_time);
            t = setTimeout(function() {
                timedCount()
            }, 1000);
        }
    }

    function startCount() {
        timedCount();
    }
</script>