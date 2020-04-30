<?php 
/**
 * консольный скрипт генерации администратора
 * Так, пользователь с id=1 получил роль admin . 
 * посмотрим в базу данных в таблицу auth_assignment:
 * //php yii rbac-admin-assign/init 1
 */
namespace app\commands;

use Yii;
use yii\console\Controller;
use app\models\User;
use yii\console\ExitCode;
use yii\helpers\Console;


//php yii rbac-admin-assign/init 1
class RbacAdminAssignController extends Controller
{
    public function actionInit($id){

        //Проверяем обязательный параметр id
        if(!$id || is_int($id)){
            // throw new \yii\base\InvalidConfigException("param 'id' must be set");
            $this->stdout("Param 'id' must be set!\n", Console::BG_RED);
            return ExitCode::UNSPECIFIED_ERROR;
        }

        //Есть ли пользователь с таким id
        $user = (new User())->findIdentity($id);
        if(!$user){
            // throw new \yii\base\InvalidConfigException("User witch id:'$id' is not found");
            $this->stdout("User witch id:'$id' is not found!\n", Console::BG_RED);
            return ExitCode::UNSPECIFIED_ERROR;
        }

        //Получаем объект yii\rbac\DbManager, который назначили в конфиге для компонента authManager
        $auth = Yii::$app->authManager;

        //Получаем объект роли
        $role = $auth->getRole('admin');

        //Удаляем все роли пользователя
        $auth->revokeAll($id);

        //Присваиваем роль админа по id
        $auth->assign($role, $id);

        //Выводим сообщение об успехе и возвращаем соответствующий код
        $this->stdout("Done!\n", Console::BOLD);
        return ExitCode::OK;
        
   }
}