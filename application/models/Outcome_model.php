<?php
class Outcome_model extends CI_Model {


    private $table = 'outcome';
    var $column_order = array('Id','Date','MoneyAmount','Name'); //set column field database for datatable orderable
    var $column_search = array('income.Id','Date','MoneyAmount','Name'); //set column field database for datatable searchable
    var $order = array('outcome.id' => 'asc'); // default order


    public function __construct()
    {
        parent::__construct();

    }

    public function insert()
    {
        $this->MoneyAmount    = $this->input->post('moneyAmount');
        $this->categoryId  = $this->input->post('categoryId');
        $this->Date     = $this->input->post('date');
        $this->Description    = $this->input->post('description');
        $this->UserId     = $this->session->userdata('id');

        return $this->db->insert('outcome', $this);


    }

    public function update()
    {
        $this->db->set('MoneyAmount',  $this->input->post('moneyAmount') );
        $this->db->set('categoryId',  $this->input->post('categoryId') );
        $this->db->set('Date',  $this->input->post('date') );
        $this->db->set('Description',  $this->input->post('description') );
        $this->db->where('Id', $this->input->post('Id'));
        return  $this->db->update('outcome');
    }
    public function find(){

        $this->db->from($this->table);
        $this->db->where('outcome.UserId=' , $this->session->userdata("id"));
        $this->db->where('outcome.Id=' , $this->input->post('id'));
        $this->db->join('outcome_categories', 'outcome.CategoryId = outcome_categories.Id');

        $query = $this->db->get();
        return $query->result();
    }

    public function findAll(){

        $this->db->from($this->table);
        $this->db->where('outcome.UserId=' , $this->session->userdata("id"));
        $this->db->join('outcome_categories', 'outcome.CategoryId = outcome_categories.Id');
        $this->db->order_by('outcome.Date', 'DESC');
        $this->db->limit(6);

        $query = $this->db->get();
        return $query->result();
    }



    private function _get_datatables_query()
    {
        $this->db->select('outcome.Id as `outcomeId`,Date,MoneyAmount,Description,Name');
        $this->db->from($this->table);
        $this->db->where('outcome.UserId=' , $this->session->userdata("id"));
        $this->db->join('outcome_categories', 'outcome.CategoryId = outcome_categories.Id');
        if ($this->input->post('from') && $this->input->post('to')){
            $this->db->where('Date >=', $this->input->post('from'));
            $this->db->where('Date <=', $this->input->post('to'));
        }

        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }


    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }






    public function get_current_user_outcome(){
        $this->db->from('outcome');
        $this->db->where('outcome.UserId=' , $this->session->userdata("id"));
        $this->db->join('outcome_categories', 'outcome.CategoryId = outcome_categories.Id');
        return $this->db->get()->result_array();
    }



}