@extends('layouts.app')

@section('navigation')
    @include('ui.adminnav')

@endsection

@section('content')
<h1 class="text-2xl text-center mt-10">Administrar Usuarios</h1>
<div class="flex justify-end mb-4">
    <a href="{{ route('users.createPDF', ['user' => null]) }}" class="text-teal-600 hover:text-teal-800 border-2 border-teal-600 hover:border-teal-800 p-2 rounded">
        Exportar a PDF
    </a>
</div>
<div class="flex flex-col mt-10">
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
      <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
        <table class="min-w-full">
          <thead class="bg-gray-100 ">
            <tr>
              <th class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                Nombre
              </th>
              <th class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                Correo Eléctronico
              </th>
              <th class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                Tipo de usuario
              </th>
              <th class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                  Acciones
              </th>
            </tr>
          </thead>
          <tbody class="bg-white">
            @foreach ($users as $user)
            <tr>
              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <div class="flex items-center">

                  <div class="ml-4">
                    <div class="text-sm leading-5 font-medium text-gray-900">{{ $user->name }} </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full">
                    {{ $user->email }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                  <a
                      href=""
                      class="text-gray-500 hover:text-gray-600"
                  >{{ $user->type->type }}</a>
              </td>
              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium">
                  {{-- Se pasa como enlace la ruta para la edición del usuario --}}
                    <a
                        href="{{ route('users.edit', ['user' => $user->id]) }}"
                        class="text-orange-500 hover:text-orange-800 mr-5"
                    >Editar</a>
                    {{-- Se incorpora el elemento de vue en sustitución del enlace --}}
                    <eliminar-usuario
                        user-id="{{ $user->id }}"
                    ></eliminar-usuario>

                    <a href="{{ route('users.show', ['user' => $user->id]) }}" class="text-blue-600 hover:text-blue-900">Ver</a>

                    <a href="{{ route('users.createPDF', ['user' => $user->id]) }}" class="text-teal-600 hover:text-teal-800 border-2 border-teal-600 hover:border-teal-800 p-2 ml-3 rounded">
                        Exportar a PDF
                    </a>
              </td>
            </tr>
            @endforeach


          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="mt-4">{{ $users->links() }}</div>

@endsection
