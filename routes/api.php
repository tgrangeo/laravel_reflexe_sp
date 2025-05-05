<?php

use \Lomkit\Rest\Facades\Rest;

Rest::resource('revisionSheets', \App\Rest\Controllers\RevisionSheetController::class);
