<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class TeamController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('Team_model');
        $this->isLoggedIn();   
    }
    
    public function all_teams()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->Team_model->teamListingCount($searchText);

			$returns = $this->paginationCompress("allteam/", $count, 10);
            
            $data['userRecords'] = $this->Team_model->teamListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Team Editing';
            
            $this->loadViews("Teams", $this->global, $data, NULL);
        }
    }

    public function edit_teams($id)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
            $data['team'] = $this->Team_model->getTeamInfo($id);
            
            $this->global['pageTitle'] = 'Edit Team Building';
            $this->loadViews("editTeam", $this->global, $data, NULL);
        }
    }

    public function update_team($id)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
            $this->load->library('form_validation');
            $this->form_validation->set_rules('team_name','Team Name','trim|required|max_length[255]');
            if($this->form_validation->run() == FALSE)
            {
                $this->edit_teams($id);
            }else{
                $data = array(
                    'team_name' => ucwords(strtolower($this->security->xss_clean($this->input->post('team_name'))))
                );
                $this->Team_model->updateTeam($data,$id);
                $this->session->set_flashdata('success', 'Team Name Updated successfully');
                return redirect('allteam');
            }
        }
    }

}