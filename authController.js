

const User = require("./models/User");
const bcrypt=require('bcryptjs');
const jwt=require('jsonwebtoken');
const {validationResult}=require('express-validator')

const generateAccessToken=(id)=>{
const payload={
    id
} 
const {secret}=require("./config")

return jwt.sign(payload,secret,{expiresIn:"24h"})
}

class authController{
    async registration(req,res){
        try{            
            const errors=validationResult(req)
            if(!errors.isEmpty()){
               return res.status(400).json({message:"Ошибка при регистрации"})
            }
            const{name,password}=req.body
            const candidate=await User.findOne({name})
            if (candidate){
                return res.status(400).json({message:"Имя уже занято"})
            }
            const hashPassword=bcrypt.hashSync(password,7);
            const user=new User({name,password:hashPassword});
            await user.save()
            return res.json({message:"Пользователь добавлен"})
        }catch(e){
            console.log(e)
            res.status(400).json({message:"Ошибка регистрации"})
        }
    }

    async login(req,res,next){
        try{
           const {name,password}=req.body
           const user=await User.findOne({name})
           if(!user){
               return res.status(400).json({message:'Пользователь ${user} не найден'})
           }
           const validPassword=bcrypt.compareSync(password,user.password)
           if(!validPassword){
            return res.status(400).json({message:'Введен неверный пароль'})
           }
           const token=generateAccessToken(user._id)
           req.body=token
           next()
        } catch(e){
            console.log(e)
        }
    }

    
    async getUsers(req,res){
        try{
            const users=await User.find()
            res.json(users)
        } catch(e){
            console.log(e)
        }
    }
}

//     async getUsers(req,res){
//         const authHeader=req.headers['authorization']
//         const token=authHeader && authHeader.split('')[1]
//         if (token == null) return res.sendStatus(401).json({authHeader}) 
//         const user=await User.findOne({token})
//         jwt.verify(token,process.env.ACCESS_TOKEN_SECRET,(err,user)=>{
//             if (err) return res.sendStatus(403)
//         })
//         console.log(req);
//         // res.json({"text": req});
//         // req.user=user
//     }
// }

module.exports=new authController()