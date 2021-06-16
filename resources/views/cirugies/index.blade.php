@extends('layouts.app')

@section('content')
<template>
    <div class="container-fluid">
      <h2 class="text-dark m-4">Historial Cirugias</h2>
      <div id="" class="card shadow">
        <div class="m-19">
          <div class="card-header py-3">
            <h5 class="text-primary font-weight-bold">Listado</h5>
          </div>
          <div class="card-body">
            <div class="container-fluid">
              <div class="row col-12 m-0 p-0">
                <div class="text-left col-sm-3 col-lg-2 col-xl-1 m-0 p-0">
                  <a href="{{ url('cirugias/add') }}" class="btn btn-success col-12 m-0 pl-0 pr-0">
                    <i class="el-icon-plus"></i>Añadir
                </a>
                </div>
                <div class="text-right col-sm-9 col-lg-10 col-xl-11 m-0 p-0">
                  <input
                    type="text"
                    class="form-control col-lg-4 col-sm-8 d-inline m-0 mt-1 mb-1"
                    placeholder="Buscar"
                    v-model="search"
                    v-on:keyup="searchFunction"
                  />
                </div>
              </div>
              <div class="table-responsive table mt-2" role="grid">
  
                <td class="m-0 p-0 w-10">
                  <div class="col-12 m-0">
                    <table class="table table-dark table-striped mtop16">
                      <thead>
                          <tr>
                              <td>Id</td>
                              <td> </td>
                              <td>Paciente</td>
                              <td>Doctor</td>
                              <td>Fecha</td>
                              <td></td>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($cirugias as $cirugia)

                    
                        <tr>
                          <td>{{ $cirugia->id }}</td>
                          <td></td>
                          <td>{{ $cirugia->id_patient }}</td>
                          <td>{{ $cirugia->id_doctor }}</td>
                          <td>{{ $cirugia->dateline }}</td>
                  
                        
                          <td>
                            <div class="opts">
                              <a href="{{ url('cirugias/'.$cirugia->id.'/detalle') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Permisos de usuario">
                                <i class="fas fa-eye"></i>
                            </a>
                                <a href="{{ url('cirugias/'.$cirugia->id.'/edit') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>   
                                <a href="{{ url('cirugias/'.$cirugia->id.'/delete') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Permisos de usuario">
                                  <i class="fas fa-trash-alt"></i>
                                </a> 
                               
                            </div>
                              
                          </td>
                        </tr>
                          
                  
                        @endforeach
                        <tr>
                          <td colspan="12">{!! $cirugias->render() !!}</td>
                      </tr>
                      </tbody>
                    </table>
                </td>
              </div>
                     
              </div>
              <div class="pagination col-12 p-0">
                <div class="text-left col-8">
                  <span class="text-black"
                    >Mostra</span
                  >
                </div>
                <div class="text-right col-4 p-0">

                  <nav
                    class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers"
                  >
                    <ul class="pagination">
                      <li class="page-item" v-if="actual + 1 > 1">
                        <a
                          class="page-link"
        
                          aria-label="Previous"
                          ><span aria-hidden="true">«</span></a
                        >
                      </li>
                      <li class="page-item disabled" v-else>
                        <a
                          class="page-link"
        
                          aria-label="Previous"
                          ><span aria-hidden="true">«</span></a
                        >
                      </li>
                      <li>
                        
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
@endsection