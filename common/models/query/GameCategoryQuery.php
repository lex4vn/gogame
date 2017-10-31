<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/4/14
 * Time: 2:31 PM
 */

namespace common\models\query;

use common\models\GameCategory;
use yii\db\ActiveQuery;

class GameCategoryQuery extends ActiveQuery
{
    /**
     * @return $this
     */
    public function active()
    {
        $this->andWhere(['status' => GameCategory::STATUS_ACTIVE]);

        return $this;
    }

    /**
     * @return $this
     */
    public function noParents()
    {
        $this->andWhere('{{%game_category}}.parent_id IS NULL');

        return $this;
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
