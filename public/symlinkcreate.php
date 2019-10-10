<?php

$linkName = '/home/nextechd/public_html/forum.nextechdevelopers.com/public/img';

$target = '/home/nextechd/public_html/forum.nextechdevelopers.com/storage/app/public/img';

symlink($target, $linkName);

