@extends('layouts.app')

@section('content')
    <div class="roles">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Add Subjects</h2>
            </div>
            <div class="flex flex-wrap items-center">
                <a href="/home" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                    <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-left" class="svg-inline--fa fa-long-arrow-alt-left fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"></path></svg>
                    <span class="ml-2 text-xs font-semibold">Back</span>
                </a>
            </div>
        </div>

        <div class="table w-full mt- bg-white rounded">
            <form action="/addCoursePost" method="POST" class="container">
                @csrf
               <div class = "row">
                    <div class="col-sm-12" style="margin-top:30px;">
                        <h6>Please assign subjects for this departement</h6>
                        <br />
                        @foreach ($subjects as $subject )
                            <div style="margin-left:20px;">
                                <label class="form-check-label">
                                <input type="checkbox" name="subjects[]"  class="form-check-input" value={{$subject->id}}
                                    {{$dept->hasAnySubject($subject->name)?'checked':''}}>
                                    {{$subject->name}} <br />
                                    @foreach ($subject->teachers as $teacher)
                                        <div class="form-check-inline" style="margin-left:20px; margin-top:20px;">
                                            <label class="radio-inline">
                                                <input type="radio" name="teacher_id{{$subject->id}}" value={{$teacher->user->id}}>
                                                {{$teacher->user->name}}
                                            </label>
                                        </div>
                                    @endforeach
                                </label>
                            </div>
                        @endforeach
                    </div>
               </div>
                <div class="md:flex md:items-center" style="margin-top:30px;">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-2/3">
                        <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                            Add subjects
                        </button>
                    </div>
                </div>
            </form>        
        </div>
        
    </div>
@endsection