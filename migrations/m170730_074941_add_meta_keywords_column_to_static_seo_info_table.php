<?php

use yii\db\Migration;

/**
 * Handles adding meta_keywords to table `static_seo_info`.
 */
class m170730_074941_add_meta_keywords_column_to_static_seo_info_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('static_seo_info', 'meta_keywords', $this->string(511));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('static_seo_info', 'meta_keywords');
    }
}
