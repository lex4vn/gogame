<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Game]].
 *
 * @see \common\models\Game
 */
class GameQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere('[[image]] <> ""');
    }

    /**
     * @inheritdoc
     * @return \common\models\Game[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Game|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
