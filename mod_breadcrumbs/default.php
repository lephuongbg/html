<?php
defined('_JEXEC') or die;
?>

<ul class="breadcrumbs">
<?php if ($params->get('showHere', 1))
	{
		echo '<li class="breadcrumbs-here">' .JText::_('MOD_BREADCRUMBS_HERE').'</li>';
	}

	// Get rid of duplicated entries on trail including home page when using multilanguage
	for ($i = 0; $i < $count; $i ++)
	{
		if ($i == 1 && !empty($list[$i]->link) && !empty($list[$i-1]->link) && $list[$i]->link == $list[$i-1]->link)
		{
			unset($list[$i]);
		}
	}

	// Find last and penultimate items in breadcrumbs list
	end($list);
	$last_item_key = key($list);
	prev($list);
	$penult_item_key = key($list);

	// Generate the trail
	foreach ($list as $key=>$item) :
	// Make a link if not the last item in the breadcrumbs
	$show_last = $params->get('showLast', 1);
	if ($key != $last_item_key)
	{
		// Render all but last item - along with separator
		if (!empty($item->link))
		{
			echo '<a href="' . $item->link . '" class="pathway">' . $item->name . '</a>';
		}
		else
		{
			echo '<li>' . $item->name . '</li>';
		}

		if (($key != $penult_item_key) || $show_last)
		{
			echo ' '.$separator.' ';
		}

	}
	elseif ($show_last)
	{
		// Render last item if reqd.
		echo '<li>' . $item->name . '</li>';
	}
	endforeach; ?>
</ul>
