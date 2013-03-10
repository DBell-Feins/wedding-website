<?php
return array(
    'directories' => array(
        path('app') . 'less' => path('public') . 'css'
    ),
    'formatter' => 'lessjs',
    'preserveComments' => true,
    'recompile' => false,
);
