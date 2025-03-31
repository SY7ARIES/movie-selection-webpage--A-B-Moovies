function jpref(y){
    let z = "";
    for(i=1;i<=3;i++){
        let x='<button type="submit" class="btn" name="pref" value="preference-'+ i +'-'+ y +'" id="btn-'+ i +'-'+ y +'">Preference '+ i +'</button>';
        z = z + x;
    }
    return '<form action="jmovies.php" method="POST">' + z + '</form>';
}

function spref(y){
    let z = "";
    for(i=1;i<=3;i++){
        let x='<button type="submit" class="btn" name="pref" value="preference-'+ i +'-'+ y +'" id="btn-'+ i +'-'+ y +'">Preference '+ i +'</button>';
        z = z + x;
    }
    return '<form action="smovies.php" method="POST">' + z + '</form>';
}
