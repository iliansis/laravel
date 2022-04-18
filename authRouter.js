const Router = require('express');
const { check } = require('express-validator');
const router = new Router()
const controller = require('./authController');
const middleWare = require('./middleWare')


router.post('/registration', [
  check('name', "Имя не может быть пустым").notEmpty(),
  check('password', "Пароль не может быть пустым").notEmpty(),
  check('password', "Пароль не может быть меньше 4 и длинее 10 символов").isLength({ min: 4, max: 10 })
], controller.registration)

router.post('/login', controller.login,middleWare, controller.getUsers)

router.get('/users',middleWare, controller.getUsers)


module.exports = router;
