<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <body>
        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            
            <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
            <title>todo</title>
            <script>


                function checkTodo(todoId) {
                    document.querySelector("#select_todo_id").value = todoId;

                    document.querySelector("#todo_form").action = "{{ route('todo.check') }}";
                    document.querySelector("#todo_form").submit();
                }

                function deleteTodo(todoId) {
                    document.querySelector("#select_todo_id").value = todoId;

                    document.querySelector("#todo_form").action = "{{ route('todo.delete') }}";
                    document.querySelector("#todo_form").submit();
                }

            </script>

        </head>
        
            <ul class="flex p-6 mb-6 bg-blue-600">
            <li class="mr-6 text-white text-2xl flex">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                </svg>
                <div class="text-black ">Todo App</div>
            </li>
            </ul>
        
        @if ($errors->any())
            <ul class="border border-red-400 bg-red-100 px-4 py-3 text-red-700 mb-10 w-4/5 m-auto">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        @endif
            
            
        <form method = "post" id="todo_form">
            @csrf
            <input type="hidden" name="select_todo_id" id="select_todo_id" valie=""/>
            <div class="w-3/5 felx mb-10 m-auto">
                <input type="text" name="content" placeholder="TODOを入力する" class="flex-auto w-32 py-2 px-2 rounded-md border-blue-500 hover:border-blue-700 ring-2 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500" />
                <button formaction="{{ route('todo.add') }}" class="cursor-pointer ml-5 shadow-md rounded-md font-semibold text-white text-base bg-blue-500 hover:bg-blue-700 ring-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                </button>
            </div>


            <ul class="w-4/5 m-auto">
            <!--繰り返し-->
                @foreach($todos as $todo)
                <li class="block py-3 border-b-2 border-gray-200 {{ $todo->check ? 'bg-gray-300' : '' }} flex justify-between">
                    <div class="flex">
                        <button type="button" onclick="checkTodo({{ $todo->id }})" class="cursor-pointer ml-3 mr-3 px-1 py-1 shadow-md rounded-md font-semibold text-white text-base {{ $todo->check ? 'bg-green-500 hover:bg-green-700 ring-green-200' : 'bg-gray-500 hover:bg-gray-700 ring-gray-200' }} ring-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <span class="text-2xl">
                            {{ $todo->content }}
                        </span>
                    </div>
                    <button type="button" onclick="deleteTodo({{ $todo->id }})" class="cursor-pointer mr-3 py-1 px-1 shadow-md rounded-md font-semibold text-white text-base bg-red-500 hover:bg-red-700 ring-2 ring-red-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </li>
                @endforeach
            </ul>
        
        </form>
        
    </body>
</html>