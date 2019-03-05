 $(document).ready(function ()
      {
        
       
      });
      function AddToast ($color,$title,$mssg)
      {
        var priority = $color;
        var title    = $title;
        var message  = $mssg;
        $.toaster({ priority : priority, title : title, message : message });
      }

