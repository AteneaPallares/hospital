$userinfo=[];
        $help=1;
        $array = array(0 => 'azul');
               
        foreach($patientsall as $element){
            if($element->roles.length>0){
            $key = array_search($element->roles[0], $array); // $clave = 2;
               
           if($key==false && $element->roles[0]!=null){
                $userinfo[$element->roles[0]]=1;
                array_push($array,$element->roles[0]);
           }else if($element->roles[0]!=null){
                $help= $userinfo[$element->roles[0]]+1;
                $userinfo[$element->roles[0]]=$help;
           }}
           
        }
        