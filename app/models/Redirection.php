<?php

class Redirection extends Eloquent {
        protected $guarded = array();
        protected $table = 'redirections'; // table name
        public $timestamps = true;

        // model function to store form data to database
        public static function saveFormData($data)
        {
            DB::table('redirections')->insert($data);
        }

}