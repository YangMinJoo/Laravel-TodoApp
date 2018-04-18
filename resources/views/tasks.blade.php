<!DOCTYPE html>
<html lang="en">
<head>
  <title>TodoApp</title>
  <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
  <style>
    html, body {
      width: 100%;
      overflow-x: hidden;
      color:#1a2e3e;
      font-family: 'Slabo 27px', serif;
      background-color: #355c7d;
    }
    .todo--header {
      color: #ffffff;
    }
    .todo--section {
        background-color: #aebdcb;
        padding-bottom: 10px;
        opacity: 0.9;
    }

    .todo--section__title {
      background-color: #5d7c97;
      padding : 3px;
      margin-top: 3%;
      margin-bottom: 3%;
    }

    .todo--input {
      width: 100%;
      padding: 10px;
    }

    .todo--button {
      padding: 10px;
      margin-top: 5px;
    }

    .todo--list {
      margin-bottom: 10px;
      border-bottom: 1px solid #ffffff;
    }

    .todo--list__title {
      float: left;
      margin-right: 20px;
    }

  </style>
</head>
<body>
  <header>
    <nav>
    </nav>
  </header>
  <main>
    @include('common.errors')
    <div class="todo--header">
      <h1>TodoApp</h1>
    </div>
    <div class="todo--section">
      <div class="todo--section__title">
        <h3>New Task</h3>
      </div>
      <form action="{{ url('task') }}" method="POST" class="form-horizontal">
          {{ csrf_field() }}
          <input type="text" name="name" class="todo--input">
          <button type="submit" class="todo--button">Add Task</button>
      </form>
    </div>


    @if (count($tasks) > 0)
    <div class="todo--section">
      <div class="todo--section__title">
        <h3>Current Tasks</h3>
      </div>
      @foreach ($tasks as $task)
      <div class="todo--list">
        <div class="todo--list__title">
          {{ $task->name }}
        </div>
        <div class="todo--list__button">
           <form action="{{ url('task/'.$task->id) }}" method="POST">
             {{ csrf_field() }}
             {{ method_field('DELETE') }}
             <button type="submit">Delete</button>
          </form>
        </div>
      </div>
      @endforeach
    </div>
    @endif
  </main>
  <footer>

  </footer>
</body>
</html>
