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
      background: linear-gradient(to right, rgb(255, 175, 189), rgb(255, 195, 160));
    }

    .todo--header {
      color: #ffffff;
    }

    .todo--section {
      background-color: #ffffff;
      opacity: 0.8;
      padding: 15px;
      margin-bottom: 15px;
    }

    .todo--section__title {
      background-color: #ffffff;
      padding : 3px;
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
