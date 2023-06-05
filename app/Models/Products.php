<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';

    public function bill_detail()
    {
        return $this->hasMany('App\Models\BillDetail','id_product','id');
    }

    public function addProduct($title, $slug, $summary, $content, $categoryId, $userId, $date)
    {
        $title = $this->db->conn->real_escape_string($title);
        $slug = $this->db->conn->real_escape_string($slug);
        $summary = $this->db->conn->real_escape_string($summary);
        $content = $this->db->conn->real_escape_string($content);
        $sql = "INSERT INTO posts (title, slug, summary, content, category_id, user_id, date)
							VALUES ('$title', '$slug', '$summary', '$content', '$categoryId', '$userId', '$date')";

        return $this->db->conn->query($sql);
    }
}
