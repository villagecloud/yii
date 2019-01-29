<?php

namespace app\commands;


use yii\console\Controller;

class RbacController extends Controller
{
    public function actionIndex()
    {
        $authManager = \Yii::$app->authManager;

        $admin = $authManager->createRole('admin');
        $moderator = $authManager->createRole('moderator');

        $authManager->add($admin);
        $authManager->add($moderator);

        $permissionTaskCreate = $authManager->createPermission('TaskCreate');
        $permissionTaskDelete = $authManager->createPermission('TaskDelete');
        $permissionTaskEdit = $authManager->createPermission('TaskEdit');

        $authManager->add($permissionTaskCreate);
        $authManager->add($permissionTaskDelete);
        $authManager->add($permissionTaskEdit);

        $authManager->addChild($admin, $permissionTaskCreate);
        $authManager->addChild($admin, $permissionTaskDelete);
        $authManager->addChild($admin, $permissionTaskEdit);

        $authManager->addChild($moderator, $permissionTaskCreate);
        $authManager->addChild($moderator, $permissionTaskEdit);

        $authManager->assign($admin, 1);
        $authManager->assign($moderator, 2);

    }

    public function actionViewer()
    {
        $authManager = \Yii::$app->authManager;
        $viewer = $authManager->createRole('viewer');

        $authManager->add($viewer);

        $permissionAttachmentCreate = $authManager->createPermission('AttachmentCreate');

        $authManager->add($permissionAttachmentCreate);

        $authManager->addChild($viewer, $permissionAttachmentCreate);

        $authManager->assign($viewer, 3);

    }

}