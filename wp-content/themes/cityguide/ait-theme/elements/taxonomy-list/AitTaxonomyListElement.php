<?php


class AitTaxonomyListElement extends AitElement
{
	public function getContentPreviewOptions()
	{
		$columns = aitOptions()->get('theme')->items->categoryColumns;

		return array(
			'layout' => 'box',
			'columns' => $columns,
			'rows' => 1,
			'content' => false,
			'script' => false
		);
	}
}
