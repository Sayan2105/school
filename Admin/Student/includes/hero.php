<div class="hero">
    <!-- <img src="https://via.placeholder.com/100" class="hero-img" alt="Teacher's Image"> -->
    <div class="hero-details">
        <?php if($row) { ?> 
            <h5>Name: <?php echo $row['first_name'] . " " . $row['last_name']; ?></h5> 
            <p>Studing in class : <?php echo $row['class_id']; ?></p> 
            <p>Age: <?php echo $row['Age']; ?></p> 
            <p>Gender: <?php echo $row['Gender']; ?></p>
            <p>Phone: <?php echo $row['phone']; ?></p> 
            <p>Email: <?php echo $row['email']; ?></p> 
            <p>Attendance: <?php echo $row['Attendance']; ?></p> 
            <p>Address: <?php echo $row['Address']; ?></p> 
        <?php } else { ?>
            <p>No information found for this teacher. where ID = <?php echo $name ?></p>
        <?php } ?>
    </div>
</div>
