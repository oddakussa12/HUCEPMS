@extends('layouts.app')

@section('content')

<div class="home">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h4 class="text-gray-700 uppercase font-bold">Courses</h4>
        </div>
    </div>
    <div class="container-fluid" style="padding:0px;">
        <div class="card">
            <div class="card-header">
                <h4>First year</h4>
            </div>
            <div class="card-body">
                <h6>1st semister</h6>
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Course Code</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Credit hrs.</th>
                        <th scope="col">Leacture</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>SK537</td>
                        <td>Fundamental of programming</td>
                        <td>3</td>
                        <td>Odda Kussa</td>
                        <td><a href="course_details">View</a></td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>SK537</td>
                        <td>Fundamental of programming</td>
                        <td>3</td>
                        <td>Odda Kussa</td>
                        <td><a href="course_details">View</a></td>
                      </tr>
                    </tbody>
                </table>
                <h6>2nd semister</h6>
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Course Code</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Credit hrs.</th>
                        <th scope="col">Leacture</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>SK537</td>
                        <td>Fundamental of programming</td>
                        <td>3</td>
                        <td>Odda Kussa</td>
                        <td><a href="course_details">View</a></td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>SK537</td>
                        <td>Fundamental of programming</td>
                        <td>3</td>
                        <td>Odda Kussa</td>
                        <td><a href="course_details">View</a></td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card" style="margin-top:50px;">
            <div class="card-header">
                <h4>Second year</h4>
            </div>
            <div class="card-body">
                <h6>1st semister</h6>
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Course Code</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Credit hrs.</th>
                        <th scope="col">Leacture</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>SK537</td>
                        <td>Fundamental of programming</td>
                        <td>3</td>
                        <td>Odda Kussa</td>
                        <td><a href="#">View</a></td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>SK537</td>
                        <td>Fundamental of programming</td>
                        <td>3</td>
                        <td>Odda Kussa</td>
                        <td><a href="#">View</a></td>
                      </tr>
                    </tbody>
                </table>
                <h6>2nd semister</h6>
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Course Code</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Credit hrs.</th>
                        <th scope="col">Leacture</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>SK537</td>
                        <td>Fundamental of programming</td>
                        <td>3</td>
                        <td>Odda Kussa</td>
                        <td><a href="#">View</a></td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>SK537</td>
                        <td>Fundamental of programming</td>
                        <td>3</td>
                        <td>Odda Kussa</td>
                        <td><a href="#">View</a></td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>
@endsection
