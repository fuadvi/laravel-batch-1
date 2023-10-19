<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;


    public function descendants()
    {
        return $this->hasMany(__CLASS__, 'parent_id')->with('descendants');
    }

    public function depth()
    {
        $depth = 0;
        $parent = $this;

        while ($parent->parent_id !== null) {
            $parent = self::find($parent->parent_id);
            $depth++;
        }

        return $depth;
    }

    public function loadChildrenWithDepth()
    {
        $descendants = $this->descendants;
        foreach ($descendants as $descendant) {
            $descendant->depth = $this->depth + 1;
            $descendant->loadChildrenWithDepth();
        }
        return $descendants;
    }
}
