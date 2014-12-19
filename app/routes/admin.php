<?php

Route::get('admin/candidate/{id}', ['as' => 'admin_candidate_edit', 'uses' => 'AdminController@candidateEdit']);