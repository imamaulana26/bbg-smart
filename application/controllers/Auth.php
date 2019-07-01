<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $email = $this->session->userdata('email');
        if (empty($email)) {
            $data['title'] = 'SMART - BBG';
            // hitung interval waktu
            $this->db->where(array('is_active' => 1, 'timestampdiff(minute, log_on, now()) >' => 30));
            $this->db->update('tbl_user', ['is_active' => 0]);

            $this->load->view('auth/auth_header', $data);
            $this->load->view('auth/v_login');
            $this->load->view('auth/auth_footer');
        } else {
            redirect(ucfirst('blocked'));
        }
    }

    public function login()
    {
        $email = (input('username')) . "@syariahmandiri.co.id";
        $pass = md5(input('password'));

        $user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();
        if ($user) {
            if ($user['is_active'] == 0) {
                if ($pass == $user['password']) {
                    $data = [
                        'role_id' => $user['role_id'],
                        'email' => $user['email'],
                        'name' => $user['nama']
                    ];
                    $this->session->set_userdata($data);
                    $this->db->where('email', $data['email']);
                    date_default_timezone_set('Asia/Jakarta');
                    $this->db->update('tbl_user', ['is_active' => 1, 'log_on' => date('Y-m-d H:i:s')]);

                    $dt_log = array(
                        'user_name' => $this->session->userdata('name'),
                        'ip_address' => $_SERVER['REMOTE_ADDR'],
                        'time_log' => date('Y-m-d H:i:s'),
                        'activity' => 'Berhasil login'
                    );
                    $this->db->insert('tbl_log', $dt_log);

                    // direct ke view sesuai dengan role user
                    if ($data['role_id'] < 3) redirect(ucfirst('admin/index'));
                    else redirect(ucfirst('maker/index'));
                } else {
                    $massage = "<div class='alert alert-danger fade-in'><a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>";
                    $massage .= "<strong>Wrong password!</strong></div>";
                    $this->session->set_flashdata('msg', $massage);
                    redirect(ucfirst('auth'));
                }
            } else {
                $massage = "<div class='alert alert-danger fade-in'><a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>";
                $massage .= "<strong>Account is being used!</strong></div>";
                $this->session->set_flashdata('msg', $massage);
                redirect(ucfirst('auth'));
            }
        } else {
            $massage = "<div class='alert alert-danger fade-in'><a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>";
            $massage .= "<strong>Email is not registered!</strong></div>";
            $this->session->set_flashdata('msg', $massage);
            redirect(ucfirst('auth'));
        }
    }

    public function login_ldap()
    {
        $email = (input('username'));
        $pass = input('password');

        $domainemail = "syariahmandiri.co.id";

        $ldap_user = $email . "@" . $domainemail;
        $ldap_dns = 'oc=bsm,dc=syariahmandiri,dc=co,dc=com';
        $ldap_host = 'svr-bsmdc5.syariahmandiri.co.id';
        $ldap_port = 389;

        $ldap_cons = ldap_connect($ldap_host, $ldap_port) or die('Could not connect to {$ldap_port}');

        ldap_set_option($ldap_cons, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ldap_cons, LDAP_OPT_REFERRALS, 0);

        if ($email == 'admin') {
            $this->login();
        } else if (@ldap_bind($ldap_cons, $ldap_user, $pass)) {
            $filter = "(sAMAccountName=" . $ldap_user . ")";
            $attr = array("memberof");
            $result = ldap_search($ldap_cons, $ldap_dns, $filter, $attr) or exit("Unable to search LDAP server");
            ldap_get_entries($ldap_cons, $result);
            ldap_unbind($ldap_cons);

            $user = $this->db->get_where('tbl_user', ['email' => $ldap_user])->row_array();
            if ($user) {
                if ($user['is_active'] == 0) {
                    $data = [
                        'role_id' => $user['role_id'],
                        'email' => $user['email'],
                        'name' => $user['nama']
                    ];
                    $this->session->set_userdata($data);
                    $this->db->where('email', $data['email']);
                    date_default_timezone_set('Asia/Jakarta');
                    $this->db->update('tbl_user', ['is_active' => 1, 'log_on' => date('Y-m-d H:i:s')]);

                    $dt_log = array(
                        'user_name' => $this->session->userdata('name'),
                        'ip_address' => $_SERVER['REMOTE_ADDR'],
                        'time_log' => date('Y-m-d H:i:s'),
                        'activity' => 'Berhasil login'
                    );
                    $this->db->insert('tbl_log', $dt_log);

                    // direct ke view sesuai dengan role user
                    if ($data['role_id'] < 3) redirect(ucfirst('admin/index'));
                    else redirect(ucfirst('maker/index'));
                } else {
                    $massage = "<div class='alert alert-danger fade-in'><a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>";
                    $massage .= "<strong>Account is being used!</strong></div>";
                    $this->session->set_flashdata('msg', $massage);
                    redirect(ucfirst('auth'));
                }
            } else {
                $massage = "<div class='alert alert-danger fade-in'><a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>";
                $massage .= "<strong>Email is not registered!</strong></div>";
                $this->session->set_flashdata('msg', $massage);
                redirect(ucfirst('auth'));
            }
        } else {
            $output = "<b>Unable to search LDAP server</b><br>";
            $output .= "<p>Please make sure your email or password is valid!</p>";
            $output .= "<a href='" . site_url('Auth') . "'>Back to Login</a>";
            $text = "<center>" . $output . "</center>";

            echo $text;
            return false;
        }
    }

    public function logout()
    {
        if ($this->session->userdata('name')) {
            $this->db->where('email', $this->session->userdata('email'));
            date_default_timezone_set('Asia/Jakarta');
            $this->db->update('tbl_user', ['is_active' => 0, 'last_login' => date('Y-m-d H:i:s')]);

            $dt_log = array(
                'user_name' => $this->session->userdata('name'),
                'ip_address' => $_SERVER['REMOTE_ADDR'],
                'time_log' => date('Y-m-d H:i:s'),
                'activity' => 'Berhasil logout'
            );
            $this->db->insert('tbl_log', $dt_log);

            // $this->session->unset_userdata('email');
            // $this->session->unset_userdata('role_id');
            // $this->session->unset_userdata('name');
            
            $massage = "<div class='alert alert-success fade-in'><a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>";
            $massage .= "<strong>You have been logged out!</strong></div>";
            $this->session->set_flashdata('msg', $massage);
            session_destroy();
            redirect(ucfirst('auth'));
        } else {
            redirect(ucfirst('not_found'));
        }
    }
}
