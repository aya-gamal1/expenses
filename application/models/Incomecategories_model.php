<?php
class Incomecategories_model extends CI_Model {


    private  $table = 'income_categories';
    var $column_order = array(null,'Name'); //set column field database for datatable orderable
    var $column_search = array('Id','Name'); //set column field database for datatable searchable
    var $order = array('income_categories.id' => 'asc'); // default order

    public function __construct()
    {
        parent::__construct();

    }
    public function insert()
    {
        $this->Name    = $this->input->post('name');
        echo  $this->db->insert('income_categories', $this);

    }
    public function update()
    {
        $this->Name    = $this->input->post('name');
        $this->db->set('Name',  $this->Name );
        $this->db->where('id', $this->input->post('id'));
        return  $this->db->update('income_categories');

    }

    private function _get_datatables_query()
    {

        $this->db->from($this->table);


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

}