@extends('layouts.app')

@section('content')
<style type="text/css" media="screen">
    #content { 
        height: 400px;
    }
</style>
<script src="/js/jquery-2.2.4.min.js" type="text/javascript" charset="utf-8"></script>
<div class="container">

    <h1>Editing {{$blog->title}}</h1>
    

    <div class="row">
    	<div class="col-md-12">
			{!! Form::open(['url' => '/edit/blog']) !!}

            <div class="form-group">
              <label for="active">Active 1 - visible 0 - not visible</label>
              {!! Form::select('active',[0,1],$blog->active,['class'=>'form-control', 'id'=>'active']) !!} 
            </div>
            <div class="form-group">
              <label for="japanese-name">Title</label>
               {!! Form::text('title',$blog->title,['class'=>'form-control','id'=>'title']) !!}
            </div>                  
            <div class="form-group">
              <label for="type">Type</label>
               {!! Form::select('type',array('rant' => 'rant', 'haul' => 'haul','news' => 'news','review'=>'review'),$blog->type,['class'=>'form-control','id'=>'type']) !!}
            </div>   
          <div id="content">{{$blog->content}}</div>
            <div class="form-group">
              <label for="s-name">Content</label>
               {!! Form::textarea('content',$blog->content,['class'=>'form-control']) !!}
            </div>    
            <div class="form-group">
              <label for="image">Image - Not Required most probably wont have one</label>
               {!! Form::text('image',$blog->image,['class'=>'form-control','id'=>'image']) !!}
            </div>
            <div class="form-group">
              <label for="url">Url Slug - URL friendly characters (no spaces just characters) eg this-is-a-good-url </label>
               {!! Form::text('url',$blog->url,['class'=>'form-control','id'=>'url']) !!}
            </div>                  
               {!! Form::hidden('blog_id',$blog->id) !!}                                                                       
            {!! Form::submit('Edit') !!}
            {!! Form::close() !!}
			
    	</div>
   	</div>

</div>
<script src="/js/ace/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
    //load the css content

    var editor = ace.edit("content");
    editor.setTheme("ace/theme/monokai");
    editor.getSession().setMode("ace/mode/html");

    //move the content from the div to the textarea
    var textarea = $('textarea[name="content"]').hide();
    editor.getSession().setValue(textarea.val());
    editor.getSession().on('change', function(){
      textarea.val(editor.getSession().getValue());
    });

    //need to ajax post it on save? 
    //ajax fopen then frwite though!

    //http://stackoverflow.com/questions/6659559/ace-editor-in-php-web-app
    // saveFile = function() {
    //     var contents = editor.getSession().getValue();



    // $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     })

    //     //e.preventDefault(); 
    //     $.ajax({

    //         type: "POST",
    //         url: '/home/save/css',
    //         data: {contents:contents},
    //         dataType: 'json',
    //         success: function (data) {
    //             //update the timestamp
    //             //$('#lastupdated-'+slideID).html(data.date);
    //             console.log(data);
    //         },
    //         error: function (data) {
    //             console.log('Error:', data);
    //         }
    //     });
    // };

    // //save on  update button too
    // $('#css-save').on('click',function(){
    //     saveFile();
    // });


    // Fake-Save, works from the editor and the command line.
    // var commands = editor.commands;
    // commands.addCommand({
    //     name: "save",
    //     bindKey: {
    //         win: "Ctrl-S",
    //         mac: "Command-S",
    //         sender: "editor|cli"
    //     },
    //     exec: function() {
    //         saveFile();
    //     }
    // });

</script>
@endsection
