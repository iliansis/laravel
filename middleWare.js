const jwt=require('jsonwebtoken')
const{secret}=require('./config')

module.exports=function(req,res,next){
    if(req.method==="OPTIONS"){
        next()
    }

    try{
      const token= req.body
      if(!token){
          return res.status(403).json({message:"Пользователь не авторизован"})
      } 
      const decodeData=jwt.verify(token,secret)
    req.users=decodeData
    next()
    } catch(e){

    }
}