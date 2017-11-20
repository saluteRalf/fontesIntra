<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PreExistentes]].
 *
 * @see PreExistentes
 */
class PreExistentesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PreExistentes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PreExistentes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
