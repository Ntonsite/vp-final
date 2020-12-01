<?php
$user_id = $this->session->userdata('user_id');
$portal = $this->session->userdata('role');

if(!$user_id){
    redirect('auth/logout');
}
