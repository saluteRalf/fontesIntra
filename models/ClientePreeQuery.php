<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ClientePree]].
 *
 * @see ClientePree
 */
class ClientePreeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ClientePree[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ClientePree|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
