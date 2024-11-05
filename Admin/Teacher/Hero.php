<div class="hero">
                <!-- <img src="https://via.placeholder.com/100" class="hero-img" alt="Teacher's Image"> -->
                <div class="hero-details">
                    <?php if($row) { ?> 
                        <h5>Name: <?php echo $row['Name']; ?></h5> 
                        <p>Age: <?php echo $row['Age']; ?></p> 
                        <p>Gender: <?php echo $row['Gender']; ?></p>
                        <p>Subject: <?php echo $row['Subject']; ?></p> 
                        <p>Email: <?php echo $row['Email']; ?></p> 
                        <p>Phone: <?php echo $row['Phone']; ?></p> 
                        <p>Address: <?php echo $row['Address']; ?></p> 
                    <?php } else { ?>
                        <p>No information found for this teacher. where ID = <?php echo $name ?></p>
                    <?php } ?>
                </div>
            </div>
