<?php $title = isset($item) ? $item->name: "add new kajian" ?>
{!! Form::myInput('text', 'tema_kajian', 'Tema Kajian', ['required']) !!}
{!! Form::myInput('text', 'nama_ustad', 'Nama Ustad', ['required']) !!}
{!! Form::myInput('text', 'lokasi_kajian', 'Lokasi Kajian', ['required']) !!}
{!! Form::myInput('date', 'waktu', 'Tanggal Pelaksanaan', ['required']) !!}
{!! Form::myInput('time', 'waktu', 'Waktu', ['required']) !!}
