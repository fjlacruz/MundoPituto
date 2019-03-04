<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/froala_editor.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/froala_style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/plugins/code_view.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/plugins/draggable.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/plugins/colors.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/plugins/emoticons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/plugins/image_manager.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/plugins/image.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/plugins/line_breaker.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/plugins/table.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/plugins/char_counter.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/plugins/video.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/fullscreen.min.js">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/file.min.js">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/plugins/quick_insert.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/plugins/help.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/third_party/spell_checker.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/plugins/special_characters.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">

  <style>
      body {
          text-align: center;
      }

      div#editor {
          width: 81%;
          margin: auto;
          text-align: left;
      }

      .ss {
        background-color: red;
      }
  </style>
</head>

<body>
  <div class="container">
      <div id='edit' style="margin-top: 30px;">

  
   

  </div>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/froala_editor.min.js" ></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/align.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/char_counter.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/code_beautifier.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/code_view.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/colors.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/draggable.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/emoticons.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/entities.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/file.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/font_size.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/font_family.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/fullscreen.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/image.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/image_manager.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/line_breaker.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/inline_style.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/link.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/lists.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/paragraph_format.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/paragraph_style.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/quick_insert.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/quote.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/table.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/save.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/url.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/video.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/help.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/print.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/third_party/spell_checker.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/special_characters.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/word_paste.min.js"></script>

  <script>
    $(function(){
      $('#edit').froalaEditor()
    });
  </script>
</body>
</html>

