<!DOCTYPE html>
<html lang="es">
<head>
    <head>
        <meta charset="utf-8">
        <title>Calendario</title>
        <?php
         include 'navg.php';
         include 'cargandop.php';
        include 'head.php';
        include 'js/scripts.php';
        ?>
        
    </head>

<style>
    
.borde{

border-radius: 20px;
border-style: groove; border-width: 4px;
width: 300px;
height: 85px;


}

.borde1{

border-radius: 20px;
border-style: groove; border-width: 4px;
border-left: 20px;
border-right: 20px;
width: 1150px;
height: 800px;


}

body{

background-color: #FFFFFF;


}




</style>

<body >

        <div class="container">





<!--<div class="borde1"><br>-->
<font  style="text-align:center;"><div class="page-header"><h2></h2></div></font>

<div class="pull-left">
                                       <div class="btn-group">
                                            <button class="btn btn-warning" data-calendar-nav="prev"><< Anterior</button>
                                            <button class="btn btn-primary" data-calendar-nav="today">Hoy</button>
                                            <button class="btn btn-warning" data-calendar-nav="next">Siguiente >></button>
                                        </div>
</div>
<div class="pull-right form-inline">
                                        <div class="btn-group ">
                                            <button class="btn btn-info" data-calendar-view="year">Año</button>
                                            <button class="btn btn-info active" data-calendar-view="month">Mes</button>
                                            <button class="btn btn-info" data-calendar-view="week">Semana</button>
                                            <button class="btn btn-info" data-calendar-view="day">Dia</button>
                                        </div>
</div>
                                        <br>
                                          <br>
                                            <br>
                                              <br>
       
 
   <br>

                <div class="row">
                        <div id="calendar"></div> 
                        <br><br>
                </div>
<br>
<br>
<br>
        </div>
        <br>
        <br>
        <br>
    

    <script src="js/underscore-min.js"></script>
    <script src="js/calendar.js"></script>
    <script type="text/javascript">

        (function($){

                var date = new Date();
                var yyyy = date.getFullYear().toString();
                var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
                var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();

     
                var options = {

                
                        modal: '#events-modal', 

              
                        modal_type:'iframe',    

              
                        events_source: 'ajax/obtener_eventos.php', 

                 
                        view: 'month',             

               
                        day: yyyy+"-"+mm+"-"+dd,   


             
                        language: 'es-ES', 

                        tmpl_path: 'tmpls/', 
                        tmpl_cache: false,


              
                        time_start: '08:00', 

            
                        time_end: '22:00',   

                        time_split: '30',    

                
                        width: '100%', 

//                        onAfterEventsLoad: function(events)
//                        {
//                                if(!events)
//                                {
//                                        return;
//                                }
//                                var list = $('#eventlist');
//                                list.html('');
//
//                                $.each(events, function(key, val)
//                                {
//                                        $(document.createElement('li'))
//                                                .html('<a href="' + val.url + '">' + val.title + '</a>')
//                                                .appendTo(list);
//                                });
//                        },
                        onAfterViewLoad: function(view)
                        {
                                $('.page-header h2').text(this.getTitle());
                                $('.btn-group button').removeClass('active');
                                $('button[data-calendar-view="' + view + '"]').addClass('active');
                        },
                        classes: {
                                months: {
                                        general: 'label'
                                }
                        }
                };


                // id del div donde se mostrara el calendario
                var calendar = $('#calendar').calendar(options); 

                $('.btn-group button[data-calendar-nav]').each(function()
                {
                        var $this = $(this);
                        $this.click(function()
                        {
                                calendar.navigate($this.data('calendar-nav'));
                        });
                });

                $('.btn-group button[data-calendar-view]').each(function()
                {
                        var $this = $(this);
                        $this.click(function()
                        {
                                calendar.view($this.data('calendar-view'));
                        });
                });

                $('#first_day').change(function()
                {
                        var value = $(this).val();
                        value = value.length ? parseInt(value) : null;
                        calendar.setOptions({first_day: value});
                        calendar.view();
                });
        }(jQuery));
    </script>


</body>
<footer>
    <?php 
            include 'fooder.php';
    ?>
</footer>

</html>
