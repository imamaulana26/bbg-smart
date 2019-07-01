<?php
function is_logged_in(){
    $ci = get_instance();
    $ci->load->model('m_data');

    $email = $ci->session->userdata('email');
    $role_id = $ci->session->userdata('role_id');
    $user = $ci->m_data->selectWhere('tbl_user', ['email' => $email])->row_array();

    if(($user['email'] != $email) || empty($email)){
        $ci->session->sess_destroy();
        redirect('auth');
    }

    $data = $ci->m_data->selectJoin(
        'tbl_user_role', ['tbl_user_menu'], 'LEFT JOIN',
        ['tbl_user_role.id' => 'tbl_user_menu.role_id'], ['tbl_user_menu.role_id' => $role_id]
    )->row_array();
    $url_control = ucfirst($ci->uri->segment(1));
    $exp = explode('/', $data['url']);
    
    if($exp[0] != $url_control){
        redirect('blocked');
    }
}

function user_helper(){
    $ci = get_instance();

    $email = $ci->session->userdata('email');
    $ci->load->model('m_data');
    $qry = $ci->m_data->selectJoin(
            'tbl_user', ['tbl_user_role'], 'LEFT JOIN', ['tbl_user.role_id' => 'tbl_user_role.id'], ['tbl_user.email' => $email]
        );
    $data['user'] = $qry->row_array();

    $data = array(
            'name' => $data['user']['nama'],
            'email' => $data['user']['email'],
            'akses' => $data['user']['role']
            );
    $ci->load->view('templates/_header', $data);
}

function input($var){
    $ci = get_instance();
	$input = htmlentities(strip_tags(trim($ci->input->post($var, true))));
	return $input;
}

function tag_input($type='', $name='', $value='', $string=null){
    $input = "<input type='".$type."' class='form-control' name='".$name."' id='".$name."' value='".$value."' $string>";
    return $input;
}